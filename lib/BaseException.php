<?php

/**
 * Build on the PHP's `Exception` class to 
 * add more features for explain this exception is
 * why(summary) and how to(resolution) solve.
 *
 * @author Nyan Lynn Htut <lynnhtut87@gmail.com>
 */

class BaseException extends Exception
{
	/**
     * @var null|string
     */
	protected $summary;

	/**
     * @var null|string
     */
	protected $resolution;

	 /**
     * Construct the exception
     *
     * @param  string|array $messages
     * @param  int $code
     * @param  Exception $previous
     * @return void
     */
	public function __construct($messages = null, $code = 0, Exception $previous = null)
	{
		if ( is_array($messages))
		{
			$this->setErrorDataFromArray($messages);

			$messages = isset($messages['message']) ? $messages['message'] : null;
		}

		parent::__construct($messages, $code, $previous);
	}

	/**
	* Get exception summary.
	*
	* @return string
	*/
	public function getSummary()
	{
		return $this->summary;
	}

	/**
	* Set exception summary.
	*
	* @return string
	*/
	public function setSummary($summary)
	{
		$this->summary = $summary;

		return $this;
	}

	/**
	* Get exception resolution.
	*
	* @return string
	*/
	public function getResolution()
	{
		return $this->resolution;
	}

	/**
	* Set exception resolution.
	*
	* @return string
	*/
	public function setResolution($resolution)
	{
		$this->resolution = $resolution;

		return $this;
	}

	 /**
     * String representation of the exception with magic method.
     *
     * @return string
     */
	public function __toString()
	{
		$summary = $this->getSummary();
		$resolution = $this->getSummary();

		$str = '';

		if ( ! is_null($summary))
		{
			$str .= 'Summary : '.$summary . "\n";
		}

		if ( ! is_null($resolution))
		{
			$str .= 'Resolution : '.$resolution . "\n";
		}

		return $str . parent::__toString();
	}

	/**
	 * Set exception error messages from array
	 * 
	 * @param array $messages
	 * @return void
	 */
	protected function setErrorDataFromArray($messages)
	{
		if ( isset($messages['summary']))
		{
			$this->setSummary($messages['summary']);
		}

		if ( isset($messages['resolution']))
		{
			$this->setResolution($messages['resolution']);
		}
	}
}