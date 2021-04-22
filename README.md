# Customize Cache Hash in TYPO3

Customize TYPO3's cache hash using TypoScript.

## Installation

With Composer `composer req pixelant/cachehash`.

Then enable the extension in TYPO3.

## Configuration

New parameters for the cache hash is added to the TypoScript property `config.tx_cachehash.parameters`

Each parameter will be parsed using stdWrap.

### Data array

Existing parameters are available in the data array (e.g. field = `gr_list`).

Available parameters from TYPO3 are:

* `id` – The page ID
* `type` – The render type
* `gr_list` – Comma separated list of groups
* `MP` – Mount point
* `siteBase` – Base for the current language
* `cHash` – cHash array
* `staticRouteArguments` – Arguments
* `domainStartPage` – ID of the site root

### Examples

This adds the current request domain to the cache hash:

```
config.tx_cachehash.parameters.domain {
  data = getEnv:HTTP_HOST
}
```

This overwrites the existing parameter `type` witht he static  string "blah". This will probably cause problems.

```
config.tx_cachehash.parameters.type = blah
```

This wraps the `domainStartPage` property in brackets:

```
config.tx_cachehash.parameters.domainStartPage {
  field = domainStartPage
  wrap = <|>
}
```
