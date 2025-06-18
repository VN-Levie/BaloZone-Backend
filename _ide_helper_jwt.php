<?php

namespace Illuminate\Contracts\Auth;

/**
 * JWT Auth Guard interface extension for better IDE support
 * This is a helper file for IntelliSense, not actually used in runtime
 */
interface Guard
{
    /**
     * Refresh the JWT token
     *
     * @return string
     */
    public function refresh();

    /**
     * Attempt to authenticate a user using the given credentials
     *
     * @param array $credentials
     * @return string|bool
     */
    public function attempt(array $credentials);

    /**
     * Log a user into the application
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return string
     */
    public function login(\Illuminate\Contracts\Auth\Authenticatable $user);

    /**
     * Log the user out of the application
     *
     * @return void
     */
    public function logout();

    /**
     * Get the currently authenticated user
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user();

    /**
     * Get the JWT factory instance
     *
     * @return \Tymon\JWTAuth\Factory
     */
    public function factory();
}
