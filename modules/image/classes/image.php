<?php defined('SYSPATH') or die('No direct script access.');

abstract class Image extends Kohana_Image 
{
	public function __construct($file)
	{
		try
		{
			// Get the real path to the file
			$file = realpath($file);
	 
			// Get the image information
			$info = getimagesize($file);
		}
		catch (Exception $e)
		{
			// Ignore all errors while reading the image
		}
	 
		if (empty($file) OR empty($info))
		{
			throw new Kohana_Exception('Not an image or invalid image: :file',
				array(':file' => Debug::path($file)));
		}
	 
		// Store the image information
		$this->file   = $file;
		$this->width  = $info[0];
		$this->height = $info[1];
		$this->type   = $info[2];
		$this->mime   = image_type_to_mime_type($this->type);
	}
	
	public function __toString()
	{
		try
		{
			// Render the current image
			return $this->render();
		}
		catch (Exception $e)
		{
			if (is_object(Kohana::$log))
			{
				// Get the text of the exception
				$error = Kohana_Exception::text($e);
	 
				// Add this exception to the log
				Kohana::$log->add(Log::ERROR, $error);
			}
	 
			// Showing any kind of error will be "inside" image data
			return '';
		}
	}
	
	public function background($color, $opacity = 100)
	{
		if ($color[0] === '#')
		{
			// Remove the pound
			$color = substr($color, 1);
		}
	 
		if (strlen($color) === 3)
		{
			// Convert shorthand into longhand hex notation
			$color = preg_replace('/./', '$0$0', $color);
		}
	 
		// Convert the hex into RGB values
		list ($r, $g, $b) = array_map('hexdec', str_split($color, 2));
	 
		// The opacity must be in the range of 0 to 100
		$opacity = min(max($opacity, 0), 100);
	 
		$this->_do_background($r, $g, $b, $opacity);
	 
		return $this;
	}
	
	public function crop($width, $height, $offset_x = NULL, $offset_y = NULL)
	{
		if ($width > $this->width)
		{
			// Use the current width
			$width = $this->width;
		}
	 
		if ($height > $this->height)
		{
			// Use the current height
			$height = $this->height;
		}
	 
		if ($offset_x === NULL)
		{
			// Center the X offset
			$offset_x = round(($this->width - $width) / 2);
		}
		elseif ($offset_x === TRUE)
		{
			// Bottom the X offset
			$offset_x = $this->width - $width;
		}
		elseif ($offset_x < 0)
		{
			// Set the X offset from the right
			$offset_x = $this->width - $width + $offset_x;
		}
	 
		if ($offset_y === NULL)
		{
			// Center the Y offset
			$offset_y = round(($this->height - $height) / 2);
		}
		elseif ($offset_y === TRUE)
		{
			// Bottom the Y offset
			$offset_y = $this->height - $height;
		}
		elseif ($offset_y < 0)
		{
			// Set the Y offset from the bottom
			$offset_y = $this->height - $height + $offset_y;
		}
	 
		// Determine the maximum possible width and height
		$max_width  = $this->width  - $offset_x;
		$max_height = $this->height - $offset_y;
	 
		if ($width > $max_width)
		{
			// Use the maximum available width
			$width = $max_width;
		}
	 
		if ($height > $max_height)
		{
			// Use the maximum available height
			$height = $max_height;
		}
	 
		$this->_do_crop($width, $height, $offset_x, $offset_y);
	 
		return $this;
	}
	
	public static function factory($file, $driver = NULL)
	{
		if ($driver === NULL)
		{
			// Use the default driver
			$driver = Image::$default_driver;
		}
	 
		// Set the class name
		$class = 'Image_'.$driver;
	 
		return new $class($file);
	}
	
	public function save($file = NULL, $quality = 100)
	{
		if ($file === NULL)
		{
			// Overwrite the file
			$file = $this->file;
		}
	 
		if (is_file($file))
		{
			if ( ! is_writable($file))
			{
				throw new Kohana_Exception('File must be writable: :file',
					array(':file' => Debug::path($file)));
			}
		}
		else
		{
			// Get the directory of the file
			$directory = realpath(pathinfo($file, PATHINFO_DIRNAME));
	 
			if ( ! is_dir($directory) OR ! is_writable($directory))
			{
				throw new Kohana_Exception('Directory must be writable: :directory',
					array(':directory' => Debug::path($directory)));
			}
		}
	 
		// The quality must be in the range of 1 to 100
		$quality = min(max($quality, 1), 100);
	 
		return $this->_do_save($file, $quality);
	}
	
	
	public function resize($width = NULL, $height = NULL, $master = NULL)
	{
		if ($master === NULL)
		{
			// Choose the master dimension automatically
			$master = Image::AUTO;
		}
		// Image::WIDTH and Image::HEIGHT deprecated. You can use it in old projects,
		// but in new you must pass empty value for non-master dimension
		elseif ($master == Image::WIDTH AND ! empty($width))
		{
			$master = Image::AUTO;
	 
			// Set empty height for backward compatibility
			$height = NULL;
		}
		elseif ($master == Image::HEIGHT AND ! empty($height))
		{
			$master = Image::AUTO;
	 
			// Set empty width for backward compatibility
			$width = NULL;
		}
	 
		if (empty($width))
		{
			if ($master === Image::NONE)
			{
				// Use the current width
				$width = $this->width;
			}
			else
			{
				// If width not set, master will be height
				$master = Image::HEIGHT;
			}
		}
	 
		if (empty($height))
		{
			if ($master === Image::NONE)
			{
				// Use the current height
				$height = $this->height;
			}
			else
			{
				// If height not set, master will be width
				$master = Image::WIDTH;
			}
		}
	 
		switch ($master)
		{
			case Image::AUTO:
				// Choose direction with the greatest reduction ratio
				$master = ($this->width / $width) > ($this->height / $height) ? Image::WIDTH : Image::HEIGHT;
			break;
			case Image::INVERSE:
				// Choose direction with the minimum reduction ratio
				$master = ($this->width / $width) > ($this->height / $height) ? Image::HEIGHT : Image::WIDTH;
			break;
		}
	 
		switch ($master)
		{
			case Image::WIDTH:
				// Recalculate the height based on the width proportions
				$height = $this->height * $width / $this->width;
			break;
			case Image::HEIGHT:
				// Recalculate the width based on the height proportions
				$width = $this->width * $height / $this->height;
			break;
			case Image::PRECISE:
				// Resize to precise size
				$ratio = $this->width / $this->height;
	 
				if ($width / $height > $ratio)
				{
					$height = $this->height * $width / $this->width;
				}
				else
				{
					$width = $this->width * $height / $this->height;
				}
			break;
		}
	 
		// Convert the width and height to integers, minimum value is 1px
		$width  = max(round($width), 1);
		$height = max(round($height), 1);
	 
		$this->_do_resize($width, $height);
	 
		return $this;
	}
}
