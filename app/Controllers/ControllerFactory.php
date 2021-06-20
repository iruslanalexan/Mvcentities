<?php
namespace EntityList\Controllers;

use EntityList\App;

class ControllerFactory
{
	/**
	 * @param string $controllerName
	 * @param string $requestMethod
	 * @param string $action
	 * @param App $DIContainer
	 * @return null|HomeController|ProfileController|RegisterController
	 */
	public static function makeController(string $requestMethod,
										  string $controllerName,
										  string $action,
										  App $DIContainer)
	{
		$controller = null;

		switch ($controllerName) {
			case "HomeController":
				$controller = new HomeController(
					$requestMethod,
					$action,
					$DIContainer->get("pager"),
					$DIContainer->get("entityDataGateway"),
					$DIContainer->get("authManager")
				);
				break;
			case "RegisterController":
				$controller = new RegisterController(
					$requestMethod,
					$action,
					$DIContainer->get("entityDataGateway"),
					$DIContainer->get("entityValidator"),
					$DIContainer->get("util"),
					$DIContainer->get("authManager"),
					$DIContainer->get("urlManager")
				);
				break;
			case "ProfileController":
				$controller = new ProfileController(
					$requestMethod,
					$action,
					$DIContainer->get("entityDataGateway"),
					$DIContainer->get("entityValidator"),
					$DIContainer->get("authManager"),
					$DIContainer->get("util"),
					$DIContainer->get("urlManager")
				);
				break;
		}

		return $controller;
	}
}
