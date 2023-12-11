<?php

echo "Installation des packages...\n";
passthru("symfony composer require annotations");
passthru("symfony composer require maker --dev");
passthru("symfony composer require symfony/apache-pack --dev");
passthru("symfony composer require twig");
passthru("symfony composer require logger");
passthru("symfony composer require profiler --dev");
passthru("symfony composer require symfony/form");
passthru("symfony composer require symfony/validator");
passthru("symfony composer require -w symfony/orm-pack");
passthru("symfony composer require symfony/mime");
passthru("symfony composer require symfony/asset");
passthru("symfony composer require symfony/mailer");
passthru("symfony composer require sensio/framework-extra-bundle");
passthru("symfony composer require symfony/security-bundle");

echo "Packages installés avec succès.\n";