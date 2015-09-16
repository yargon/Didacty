<?php
namespace hacker12\tutorial_engine;
use Exception;

class ParseManifest
{
    public $debug = true;
    public $path = "../";
    public $manifest = "";
    public $raw_data = "";
    public $data;

    private $isLoaded = false;
    private $ressources = array();

    function loadManifest($manifest=false)
    {
        if($manifest)
        {
            $path = $this->path.$manifest;
            if($this->debug)
            {
                d($path);
            }
        }
        else
        {
            $path = $this->path.$this->manifest;
        }

        if(($raw_data = file_get_contents($path)) !== false)
        {
            $this->raw_data = $raw_data;
            $this->isLoaded = true;
            $this->data = json_decode($this->raw_data);
            return true;
        }
        else
        {
            return false;
        }
    }

    function getVersion()
    {
        if($this->isLoaded)
        {
            return $this->data->engine_version;
        }
        else
        {
            return false;
        }
    }

    function getAuthor()
    {
        if($this->isLoaded)
        {
            return $this->data->author;
        }
        else
        {
            return false;
        }
    }

    function getTutorial()
    {
        if($this->isLoaded)
        {
            $tutorial = array(
                                "title" => $this->data->title, 
                                "creationDate" => $this->data->creationDate,
                                "updatedDate" => $this->data->updatedDate,
                                "summary" => $this->data->summary,
                                "tags" => $this->data->tags,
                                "ressources" => $this->data->ressources,
                                "steps" => $this->data->steps
                            );
            return $tutorial;
        }
        else
        {
            return false;
        }        
    }

    function registerRessource($ressource)
    {
        // list of prohibited keywords
        $prohibited_keywords = array('array','static','Exception','self','parent');
        // check md5
        // check url
        // check if ressource name is already used
        if(is_array($ressource))
        {
            $ressource = (array) $ressource;
            if($this->debug)
            {
               d($ressource); 
            }
            
            if(in_array($ressource->name, $prohibited_keywords))
            {
                throw new Exception("Error: ressource name is prohibited (You may not use ".print_r($prohibited_keywords,true).")", 1);
                die;
            } 
        }
        else
        {
            throw new Exception("Error: Wrong ressource format", 1);
            die;
        }
        if(isset($ressource->display))
        {
            if($ressource->display == "inline")
            {
                // this is an embbeded image
            }
            elseif($ressource->display == "download")
            {
                // this is a download link
            }
            else
            {
                // default display behavior
            }
        }
        else
        {
            // default display behavior
        }

        if($ressource->type == "image/png" || $ressource->type == "image/jpeg")
        {
            
        }
        elseif($ressource->type == "video/mpeg")
        {

        }
        else
        {

        }
    }
}

class Tutorial
{
    function __construct()
    {

    }

    function isSupportedVersion()
    {

    }
}
?>