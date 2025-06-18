<?php

/**
 * IDE Helper for Laravel Auth and JWT Auth
 * This file helps IDEs understand the available methods on Auth facades and guards
 */

namespace Illuminate\Contracts\Auth {
    interface Guard
    {
        /**
         * Refresh the JWT token
         * @return string
         */
        public function refresh(): string;

        /**
         * Attempt to authenticate with credentials
         * @param array $credentials
         * @return string|false
         */
        public function attempt(array $credentials);

        /**
         * Get the token factory
         * @return \Tymon\JWTAuth\Factory
         */
        public function factory();

        /**
         * Log the user out
         * @return void
         */
        public function logout(): void;
    }
}

namespace Tymon\JWTAuth {
    interface Factory
    {
        /**
         * Get TTL
         * @return int
         */
        public function getTTL(): int;
    }
}
