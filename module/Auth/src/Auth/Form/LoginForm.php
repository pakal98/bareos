<?php

/**
 *
 * bareos-webui - Bareos Web-Frontend
 *
 * @link      https://github.com/bareos/bareos-webui for the canonical source repository
 * @copyright Copyright (c) 2013-2014 Bareos GmbH & Co. KG (http://www.bareos.org/)
 * @license   GNU Affero General Public License (http://www.gnu.org/licenses/)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Auth\Form;

use Zend\Form\Form;

class LoginForm extends Form
{

	protected $config;

	public function __construct($config=null, $name=null)
	{

		$this->config = $config;

		parent::__construct('login');

		$this->add(array(
					'name' => 'director',
					'type' => 'select',
					'options' => array(
						'label' => 'Director',
						'empty_option' => 'Please choose a director',
						'value_options' => $this->getDirectors(),
					),
				)
		);

		$this->add(array(
					'name' => 'consolename',
					'type' => 'text',
					'options' => array(
						'label' => 'Username',
					),
					'attributes' => array(
						'placeholder' => 'Username',
					),
				)
		);

		$this->add(array(
					'name' => 'password',
					'type' => 'password',
					'options' => array(
						'label' => 'Password',
					),
					'attributes' => array(
						'placeholder' => 'Password',
					),
				)
		);

		$this->add(array(
			'name' => 'submit',
		'type' => 'submit',
		'attributes' => array(
			'value' => 'submit',
			'id' => 'submit',
		),
		)
	);

	}


	public function getDirectors()
	{
		$selectData = array();

		foreach($this->config as $dird) {
			$selectData[$dird['host']] = $dird['host'];
		}

		return $selectData;
	}

}
