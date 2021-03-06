<?php
/**
 * @author h.woltersdorf
 */

namespace Fortuneglobe\IceHawk\Tests\Unit\Fixtures;

use Fortuneglobe\IceHawk\Constants\Http;
use Fortuneglobe\IceHawk\Interfaces\ServesRequestInfo;
use Fortuneglobe\IceHawk\UriRewriter;

/**
 * Class TestUriRewriterWithValidMap
 *
 * @package Fortuneglobe\IceHawk\Tests\Unit\Fixtures
 */
class TestUriRewriterWithValidMap extends UriRewriter
{

	private static $simpleMap = [
		"#/non/regex/rewrite#"      => [ '/non_regex_rewrite', Http::MOVED_PERMANENTLY ],
		"#/non/regex/no/code#"      => [ '/non_regex_no_code' ],
		"#^/regex/rewrite/?#"       => [ '/regex_rewrite', Http::MOVED_TEMPORARILY ],
		"#^/regex/param/([^/]+)/?#" => [ '/regex_param_$1', Http::MOVED_TEMPORARILY ],
	];

	public function rewrite( ServesRequestInfo $requestInfo )
	{
		return $this->rewriteUriBySimpleMap( $requestInfo->getUri(), self::$simpleMap );
	}
}
