<?php

namespace User\Bundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle
{
        public function getParent()
	{
		return 'FOSUserBundle';
	}
}
