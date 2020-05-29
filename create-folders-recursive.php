
	function expandDirectories($root, $search, $i){

		$isDirExist = [];
		foreach(scandir($root) as $item) {

			$absolutePath = $root.DIRECTORY_SEPARATOR.$item;

			
			if(($item !== '.') && ($item !== '..'))
			{
				if(is_dir($absolutePath) && !in_array($item, $search)){
					
					$this->expandDirectories($absolutePath, $search, $i+1);
				} 

				if(is_dir($absolutePath) && (false !== $key = array_search($item, $search)))
				{
					
					$isDirExist[]= $search[$key];
				}

			}
			
		}

		foreach($search as $item)
		{
			if(!in_array($item, $isDirExist) && $i!=0){
				mkdir($root . '/' . $item, 0777, true);
				echo $root. '/' . $item . '<br>';
			}
		}
	
  }

/**
 *CALL OF METHOD expandDirectories with the path and a array with name of folders for create
 *
 * $this->expandDirectories(public_path() . "/test-recursive" , ['img-carta', 'img-menu', 'img-pizarra'], 0);
 *
 *
**/