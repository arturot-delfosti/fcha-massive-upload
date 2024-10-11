<?php

namespace Delfosteam\FCHA_Massive\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Delfosteam\FCHA_Massive\Traits\HasResponse;
use Exception;

// Form requests
use Delfosteam\FCHA_Massive\Requests\MassiveUpload\UploaderRequest;
use Delfosteam\FCHA_Massive\Requests\MassiveUpload\GetActionRequest;

// Services
use Delfosteam\FCHA_Massive\Services\PackageConfigurationService;
use Delfosteam\FCHA_Massive\Services\PackageConfigurationValidationService;
use Delfosteam\FCHA_Massive\Services\MassiveUploadService;

class MassiveUploadController extends Controller
{
    use HasResponse;

    private $packageConfigurationValidationService;
    private $packageConfigurationService;
    private $massiveUploadService;

    public function __construct()
    {
        $this->packageConfigurationValidationService = new PackageConfigurationValidationService();
        $this->packageConfigurationService = new PackageConfigurationService();
        $this->massiveUploadService = new MassiveUploadService();
    }

    public function getActions(Request $request)
    {

        $validateConfiguration = (new PackageConfigurationValidationService)->validate();

        if ($validateConfiguration->fails()) {
            return response()->json($validateConfiguration->errors());
        }

        $response = $this->massiveUploadService->getActions();

        return $this->successResponse($response);
    }

    public function getAction(GetActionRequest $request)
    {
        try {
            $validateConfiguration = (new PackageConfigurationValidationService)->validate();

            if ($validateConfiguration->fails()) {
                return $this->validationErrorResponse($validateConfiguration->errors());
            }

            $params = $request->all();
            $params['domain'] = $request->getSchemeAndHttpHost();

            $response = $this->massiveUploadService->getAction($params);

            return $this->successResponse($response);
        } catch (Exception $ex) {
            return $this->exceptionResponse(
                $ex->getMessage(),
                $ex->getLine(),
                $ex->getCode()
            );
        }

    }

    public function getModels(Request $request)
    {

        $response = $this->massiveUploadService->getModels();

        return $this->successResponse($response);
    }

    public function uploader(UploaderRequest $request)
    {
        try {
            $validateConfiguration = (new PackageConfigurationValidationService)->validate();

            if ($validateConfiguration->fails()) {
                return $this->validationErrorResponse($validateConfiguration->errors());
            }

            $params = $request->all();
            $params['domain'] = $request->getSchemeAndHttpHost();

            $response = $this->massiveUploadService->uploader($params);

            return $this->successResponse($response);

        } catch (Exception $ex) {
            return $this->exceptionResponse(
                $ex->getMessage(),
                $ex->getLine(),
                $ex->getCode()
            );
        }
    }
}
