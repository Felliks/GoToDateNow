<?php

/**
 * Class DataFile
 */
class DataFile
{
    /**
     * @var string
     */
    protected $pathDir;

    /**
     * @var string
     */
    protected $fileRegex = '/^[a-z0-9]+\.ixt$/i';

    /**
     * DataFile constructor.
     *
     * @param string $pathDir
     */
    public function __construct(string $pathDir)
    {
        $this->setPathDir($pathDir);
    }

    /**
     * @return string
     */
    public function getPathDir(): string
    {
        return $this->pathDir;
    }

    /**
     * @param string $pathDir
     *
     * @throws Exception
     */
    public function setPathDir(string $pathDir)
    {
        if (!is_dir($pathDir))
            throw new Exception(sprintf('Dir "%s" not found.', $pathDir));

        $this->pathDir = $pathDir;
    }

    /**
     * @return string
     */
    public function getFileRegex(): string
    {
        return $this->fileRegex;
    }

    /**
     * @param string $fileRegex
     */
    public function setFileRegex(string $fileRegex)
    {
        $this->fileRegex = $fileRegex;
    }

    /**
     * @return string[]
     */
    public function getFiles() : array
    {
        $result = [];

        foreach (scandir($this->getPathDir()) as $value) {
            if (!is_file(sprintf('%s/%s', $this->getPathDir(), $value))) continue;
            if (!preg_match($this->getFileRegex(), $value)) continue;

            $result[] = $value;
        }

        return $result;
    }
}