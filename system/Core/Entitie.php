<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 11:23 PM
 */

namespace CodeIgniter\Core;

use App\Models\CuentaModel;

class Entitie
{

	public function __get($key)
	{
		if (property_exists($this, $key))
		{
			return $this->$key;
		}
		else
		{
			return null;
		}
	}
	public function __set($key, $value)
	{
		if (property_exists($this, $key))
		{
			$this->$key = $value;
		}
	}
	public function __call($name, $arguments)
	{
		if (method_exists($this, $name))
		{
			return $this->$name($arguments);
		}
		else
		{
				//getArrayRuta
			if (strpos($name, 'getArray') !== false)
			{
				$key = str_replace('getArray', '', $name);
				return $this->__getArrayOf($key);
			}
			else if (strpos($name, 'get') !== false)
			{
				$key = str_replace('get', '', $name);
				return $this->__getEntityOf($key);
			}
			else if (strpos($name, 'set') !== false)
			{
				$key = str_replace('set', '', $name);
				$this->__set($key, $arguments);
			}
		}
	}

	private function __getEntityOf($key)
	{
		$key         = lcfirst($key);
		$stringModel = 'App\Models' . '\\' . ucfirst($key) . 'Model';

		if (class_exists($stringModel))
		{
			$model = new $stringModel();

			$id = 'id_' . $key;

			$entidad = $model->where($id, $this->$id)->first();
			return $entidad;
		}
		else
		{
			return null;
		}
	}
	public function __getArrayOf($key)
	{
		//Ruta
		$key         = lcfirst($key);
		$stringModel = 'App\Models' . '\\' . ucfirst($key) . 'Model';

		if (class_exists($stringModel))
		{
			$model = new $stringModel();
			//from entitie cuenta = id_cuenta
			$id = $this->getIdString();

			$builder = $model->table(lcfirst($key));

			$entidades = $builder->where($id, $this->getId())->get()->getResultObject();

			return $entidades;
		}
		else
		{
			return null;
		}
	}

}
