<?php
/**
 * @author h.woltersdorf
 */

namespace Fortuneglobe\IceHawk\Interfaces;

/**
 * Interface ServesRequestInfo
 *
 * @package Fortuneglobe\IceHawk\Interfaces
 */
interface ServesRequestInfo
{
	/**
	 * @return string
	 */
	public function getMethod();

	/**
	 * @return string
	 */
	public function getUri();

	/**
	 * @return string
	 */
	public function getHost();

	/**
	 * @return string
	 */
	public function getUserAgent();

	/**
	 * @return string
	 */
	public function getServerAddress();

	/**
	 * @return string
	 */
	public function getClientAddress();

	/**
	 * @return float
	 */
	public function getRequestTimeFloat();

	/**
	 * @return string
	 */
	public function acceptsContentTypes();

	/**
	 * @return string
	 */
	public function getQueryString();
}