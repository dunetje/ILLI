<?PHP
	NAMESPACE ILLI\Core\Std\Def;
	USE ILLI\Core\Std\Def\__const_Type;
	USE ILLI\Core\Std\Def\ADTDirectory\ComponentMethodCallException;
	USE ILLI\Core\Std\Def\ADTDirectory\ComponentInitializationException;
	USE Exception;
	
	FINAL CLASS ADTDirectory EXTENDS \ILLI\Core\Std\Def\ADT
	{
		#:ILLI\Core\Std\Def\ADT:
			/**
			 * Instantiate a new Abstract Data Type Definition of directory.
			 *
			 * @catchable	ILLI\Core\Std\Def\ADTDirectory\ComponentInitializationException
			 */
			public function __construct()
			{
				try
				{
					parent::__construct([__const_Type::SPL_DIRECTORY]);
				}
				catch(ComponentInitializationException $E)
				{
					throw $E;
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentInitializationException';
					$a = ['class' => $c];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentInitializationException($E, $a)
						: new $e($E, $a);
				}
			}
			
			/**
			 * value validation
			 *
			 * The value is of type string and the path of an existing directory.
			 *
			 * @param	mixed $__value
			 * @return	boolean
			 * @catchable	ILLI\Core\Std\Def\ADTDirectory\ComponentInitializationException
			 * @throws	ILLI\Core\Std\Def\ADTDirectory\ComponentInitializationException::ERROR_M_VALIDATE
			 * @see		ILLI\Core\Std\Def\__const_Type
			 */
			public function validate($__value)
			{
				try
				{
					return __const_Type::SPL_STRING === getType($__value) && TRUE === is_dir($__value);
				}
				catch(Exception $E)
				{
					$c = get_called_class();
					$e = $c.'\ComponentMethodCallException';
					$a = ['method' => __METHOD__];
					throw ($c === __CLASS__ || FALSE === class_exists($e))
						? new ComponentMethodCallException($E, $a, ComponentMethodCallException::ERROR_M_VALIDATE)
						: new $e($E, $a, $e::ERROR_M_VALIDATE);
				}
			}
		#::
	}