<?php

namespace Delfosteam\FCHA_Massive\Controllers;

use Illuminate\Http\Request;
use Delfosteam\FCHA_Massive\Traits\HasResponse;
use App\Http\Controllers\Controller;

use Error;

// Services
use Delfosteam\FCHA_Massive\Services\MassiveUploadLogService;

class MassiveUploadLogController extends Controller
{
    use HasResponse;

    private $massiveUploadLogService;

    public function __construct()
    {
        $this->massiveUploadLogService = new MassiveUploadLogService();
    }

    public function show(Request $request)
    {
        try {

            $params = $request->all();
            $response = $this->massiveUploadLogService->show($params);

            return $this->resourceResponse($response, 200);
        } catch (Error $ex) {

            return $this->exceptionResponse(
                $ex->getMessage(),
                $ex->getLine(),
                $ex->getCode()
            );
        }
    }

    public function get(Request $request)
    {
        try {
            $params = $request->all();
            $response = $this->massiveUploadLogService->get($params);

            return $this->resourceResponse($response, 200);
        } catch (Error $ex) {

            return $this->exceptionResponse(
                $ex->getMessage(),
                $ex->getLine(),
                $ex->getCode()
            );
        }
    }

    public function list(Request $request)
    {
        try {
            $params = $request->all();
            $response = $this->massiveUploadLogService->list($params);

            return $this->resourceResponse($response, 200);
        } catch (Error $ex) {

            return $this->exceptionResponse(
                $ex->getMessage(),
                $ex->getLine(),
                $ex->getCode()
            );
        }
    }
}
