<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller
{
    use FlashMessages;

    protected $data = null;

    protected function setPageTitle($title, $subTitle)
    {
        view()->share([
            'pageTitle' => $title,
            'subTitle' => $subTitle,
        ]);
    }

    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;
        return response()->view('errors.' .$errorCode, $data, $errorCode);
    }
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error' => $error,
            'response_code' => $responseCode,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function responRedirect($route, $message, $type = 'info', $error = false, $withOldInputError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if($error && $withOldInputError){
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
