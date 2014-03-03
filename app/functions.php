<?php

	function profitCenterTitle($param) {
		switch ($param) {
			case 1: $profitCenterTitle = 'wash'; break;
			case 2: $profitCenterTitle = 'store'; break;
			case 3: $profitCenterTitle = 'lube'; break;
			case 4: $profitCenterTitle = 'detail'; break;
			case 5: $profitCenterTitle = 'express'; break;
			case 5: $profitCenterTitle = 'other'; break;

			default:1; $profitCenterTitle = 'wash'; break;
		}
		return $profitCenterTitle;
	}
