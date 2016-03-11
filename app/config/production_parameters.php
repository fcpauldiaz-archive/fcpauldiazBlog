<?php
    //$db = parse_url(getenv('CLEARDB_DATABASE_URL'));
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'es');
    $container->setParameter('mailer_transport', gmail);
    $container->setParameter('mailer_host', null);
    $container->setParameter('mailer_user', getenv('EMAIL_USER'));
    $container->setParameter('mailer_password', getenv('EMAIL_PASSWORD'));