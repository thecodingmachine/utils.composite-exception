<?php
namespace Mouf\Utils;

/**
 * A simple PHP exception that can aggregate multiple exceptions in one.
 */
class CompositeException extends \Exception
{
    /**
     * @var \Throwable[]
     */
    private $exceptions = array();

    /**
     * Add a new exception to the stack of exceptions.
     *
     * @param \Exception $throwable
     */
    public function add(\Exception $throwable) {
        $this->exceptions[] = $throwable;
        $this->computeMessage();
    }

    /**
     * @return bool
     */
    public function isEmpty() {
        return empty($this->exceptions);
    }

    private function computeMessage() {
        $this->message = count($this->exceptions)." exception(s) have been thrown:\n\n";
        $i = 0;
        foreach ($this->exceptions as $exception) {
            $i++;
            $this->message .= get_class($exception)." (n°$i): ". $exception->getMessage()."\n";
            $this->message .= "Stacktrace: ". $exception->getTraceAsString()."\n\n";
        }
    }
}
