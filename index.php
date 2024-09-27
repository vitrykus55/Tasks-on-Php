<?php

interface FormatterInterface
{
    public function format($string);
}

class RowFormatter implements FormatterInterface
{
    public function format($string)
    {
        return $string;
    }
}

class DataFormatter implements FormatterInterface
{
    public function format($string)
    {
        return date('Y-m-d H:i:s' . ' ' . $string);
    }
}

interface DeliveryInterface
{
    public function deliver($formatedString);
}

class EmailDelivery implements DeliveryInterface
{
    public function deliver($formatedString)
    {
        echo 'Your format is' . $formatedString . 'by email';
    }
}

class SMSDelivery implements DeliveryInterface
{
    public function deliver($formatedString)
    {
        echo 'Your format is' . $formatedString . 'by sms';
    }
}

class ConcsoleDelivery implements DeliveryInterface
{
    public function deliver($formatedString)
    {
        echo 'Your format is' . $formatedString . 'by console';
    }

}

interface StorageInterface
{
    public function connect($string);
}

class Storage implements StorageInterface
{
    public function connect($string)
    {
        echo 'Your storage is' . $string . ' not working now!';
    }
}

class Logger
{
    private $formatter;
    private $delivery;


    public function __construct(FormatterInterface $formatter, DeliveryInterface $delivery, StorageInterface $storage)
    {
        $this->formatter = $formatter;
        $this->delivery = $delivery;
        $this->storage = $storage;

    }
    public function log($string){
        $formattedString = $this->formatter->format($string);
        $this->delivery->deliver($formattedString);
        $this->storage->connect($formattedString);
    }
}

$logger = new Logger(new RowFormatter(), new SmsDelivery(), new Storage());

$logger->log('Emergency error! Please fix me!');