<?php
class MyReadDir {

    function create() {
        return new MyReadDir();
    }

    function getDir($directory = "", $exclude_folder = array())
	{
		global $MyReadDir;
		if (!isset($MyReadDir)) MyReadDir::create();
		
		$stack= array();
		$stack[] = $directory;
		
        while($cur_directory=array_pop($stack))
		{
			if ( array_search($cur_directory, $exclude_folder) === false && $handle = opendir($cur_directory) )
			{
				while (false !== ($file = readdir($handle)))
				{
					if ( !eregi("^\.", $file) )
					{
						if ( is_dir($cur_directory . "/" . $file) )
						{
							array_push($stack, $cur_directory . "/" . $file);
							$files[] = $cur_directory . "/" . $file;
						}
						elseif ( !is_dir($cur_directory . "/" . $file) ) $files[] = $cur_directory . "/" . $file;
					}
				}
				closedir($handle);
			}
		}

        if (isset($files)) return $files;
		else return false;
    }

 
}
?>