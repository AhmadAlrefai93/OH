<?php
/*
ObjectHandler is a class that save object in memory file, 
where the object will save as a serialized object. 
ObjectHandler contain two method which are (save) that use to store object on file
and (find) that return object by object key.
*/  
class ObjectHandler
{	
    public static function save($obj)
    {
		// cnvert object to serialized form.
		$s = serialize($obj);
		// create and initialize key for the received object.
		static $GKey=0;
		$GKey++;
		// store object and the generated key on the file, then return it to the user.
		file_put_contents($GKey, $s);
        return $GKey;
    }

    public static function find($key)
    {
		// check whether object exist or not.	
		if (!@file_get_contents($key)) {
			echo 'Object Not Found !!!';
		}
		else
		{
			// retrive object by object key.
			$s = file_get_contents($key);
			// unserialize object and return it.
			$a = unserialize($s);
			return $a;
		}
	}

}

