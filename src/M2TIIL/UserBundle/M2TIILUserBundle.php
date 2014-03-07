<?php

namespace M2TIIL\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class M2TIILUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
