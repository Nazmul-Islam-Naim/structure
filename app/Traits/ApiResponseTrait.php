<?php
namespace App\Traits;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

trait ApiResponseTrait
{
    /**
     * status message
     * @var string
     */
    public $status = 'Success';

    /**
     * status code
     * @var int
     */
    public $code = 200;

    /**
     * response message
     * @var string
     */
     public $message = '';

     /**
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status ?? $this->status;
    }

     /**
     * @param string $code
     */
    public function setCode($code) {
        $this->code = $code ?? $this->code;
    }

     /**
     * @param string $message
     */
    public function setMessage($message):self {
        $this->message = $message ?? $this->message;
        return $this;
    }

    /**
     * @return $status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @return $code
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @return $message
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @method mixed successResponse(@param $response)
     * @param  object $response
     * @return mixed response
     */
	public function successResponse ($response) {
        return response()->json([
            'status' => $this->getStatus(),
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
            'data' => $response
        ]);
    }

    /**
     * @method mixed exceptionResponse(@param $exception)
     * @param  object $response
     * @return mixed response
     */
	public function exceptionResponse ($exception) {
        if ($exception instanceof ValidationException) {
            $this->setStatus('Faild');
            $this->setCode($exception->getCode());
            $this->setMessage($exception->getMessage());
        } elseif ($exception instanceof QueryException) {
            $this->setStatus('Faild');
            $this->setCode($exception->getCode());
            $this->setMessage($exception->getMessage());
        } else {
            $this->setStatus('Faild');
            $this->setCode($exception->getCode());
            $this->setMessage($exception->getMessage());
        }
        return response()->json([
            'status' => $this->getStatus(),
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ]);
    }
}
