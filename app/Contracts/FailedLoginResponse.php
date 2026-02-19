<?php

namespace App\Contracts;

interface FailedLoginResponse
{
    public function toResponse($request);
}
