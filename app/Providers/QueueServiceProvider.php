<?php

namespace App\Providers;

use App\Helpers\FailedJobProvider;
use Illuminate\Queue\QueueServiceProvider as IlluminateQueueServiceProvider;

class QueueServiceProvider extends IlluminateQueueServiceProvider
{
    /**
     * @return mixed
     */
    protected function registerFailedJobServices()
    {
        $this->app->singleton('queue.failer', function ($app) {
            $config = $app['config']['queue.failed'];

            if (isset($config['driver']) && $config['driver'] === 'dynamodb') {
                return $this->dynamoFailedJobProvider($config);
            } elseif (isset($config['driver']) && $config['driver'] === 'database-uuids') {
                return $this->databaseUuidFailedJobProvider($config);
            } elseif (isset($config['table'])) {
                return new FailedJobProvider($this->app['db'], $config['database'], $config['table']);
            } else {
                return new NullFailedJobProvider();
            }

        });
    }

}
