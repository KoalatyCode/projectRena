<?php
// Load baseConfig first..
$app->container->singleton("baseConfig", function($container) use ($app) {
    return new \ProjectRena\Lib\baseConfig();
});

// Load everything else
// Paths to load files in
$load = array(
    __DIR__."/../src/Lib/*.php",
    __DIR__."/../src/Lib/*/*.php",
    __DIR__."/../src/Lib/*/*/*.php",
    __DIR__."/../src/Model/*.php",
    __DIR__."/../src/Model/*/*.php",
    __DIR__."/../src/Model/*/*/*.php",
);

foreach ($load as $path)
{
    $files = glob($path);
    foreach ($files as $file)
    {
        $exp = explode("/../src/", $file);
        $basename = basename($file);
        $callName = str_replace(".php", "", $basename);
        $namespace = "ProjectRena\\".str_replace(".php", "", str_replace("/", "\\", $exp[1]));

        if(stristr($file, "EVEApi"))
        {
            $ep = explode("/EVEApi/", $file);
            $ep = explode("/", $ep[1]);
            $callName = "EVE" . $ep[0] . $callName;
        }

        if (method_exists(new $namespace($app), "RunAsNew"))
        {
            $app->container->set($callName, function($container) use ($app, $namespace) {
                return new $namespace($app);
            });
        } else {
            // Load all the models and Libraries as singletons in Slim..
            $app->container->singleton($callName, function($container) use ($app, $namespace) {
                return new $namespace($app);
            });
        }
    }
}