<?php

namespace App\Repositories\Handle;
use App\Http\Requests\Request;
use App\Repositories\Base\RepositoryInterface;

interface HandleInterface
{
    public function imageHandle($files_upload);



}