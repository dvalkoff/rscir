<?php

class ShellExecutor
{
    private static $commands = ["ls", "ps", "whoami", "id"];

    public function execute($command) {
        if (in_array($command, self::$commands)) {
            echo shell_exec($command);
        } else {
            echo "Unrecognized command $command was provided";
        }
    }
}