# Unit testing module for Cotonti

This module automates execution of unit tests which can be bundled with Cotonti core and extensions.

## Installation

1. Download this repository as .zip or .tar.gz file and unpack it to some folder.
2. Copy "testing" folder to you Cotonti modules directory.
3. Go to Administration / Extensions and install the module.

## Getting started

Instructions on testing and writing tests are given on the module page itself.
Open it in your browser via http://example.com/index.php?e=testing or http://example.com/testing (depending on your URL settings).

For example, if you develop a module called 'myext', you can create a test file called 'myext/test/myext.test.php' and put a following function in it:

```php
// Include functions from your module
require_once cot_incfile('myext', 'module');

// This function tests myext_foo()
// you can do multiple tests in a single function or file
function test_myext_foo()
{
	$res = myext_foo('bar');
	if ($res === 'baz')
	{
		return true;
	}
	else
	{
		cot_error('test_myext_foo(): myext_foo() returned ' . $res);
		return false;
	}
}
```

Then you can open testing module and run tests for this particular extension or entire site at once.