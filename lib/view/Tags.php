<?php

namespace lib\view;

/**
 * Description of Tags
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class Tags {
    
   /**
     * @var string
     */
    const TAG_END = "'}";
    /**
     * Pattern for the tag extended layout for primary template file
     * @var string
     */
    const PATTERN_EXTENDS = "/\{@extends '[^']+'\}/";
    /**
     * @var string
     */
    const TAG_EXTENDS = "{@extends '";
    /**
     * @var string
     */
    const TAG_BLOCK_CONTENT = "{@block 'content'}";

    /**
     * Pattern for include tag
     * @var string
     */
    const PATTERN_INCLUDE = "/\{@include '[^']+'\}/";
    /**
     * @var string
     */
    const TAG_INCLUDE = "{@include '";
    
    /**
     * Pattern for block start tag
     * @var string
     */
    const PATTERN_BLOCK_START = "/\{@block name='[^']+'\}/";
    /**
     * @var string
     */
    const TAG_BLOCK_START = "{@block name='";
   /**
     * @var string
     */
    const TAG_BLOCK_END = "{/block}";
    
    /**
     * Pattern for block tag
     * @var string
     */
    const PATTERN_BLOCK = "/\{@block '[^']+'\}/";
    /**
     * @var string
     */
    const TAG_BLOCK = "{@block '";
    /**
     * @var string
     */
    const TAG_BLOCK_CSS = '<link id="block:css" />';
    /**
     * @var string
     */
    const TAG_BLOCK_JS = '<script id="block:js" />';

}
