# Changelog

## [2.2.0] - 2025-09-30
### Added
- New `AlternateLinkTag` entity for rendering `<link rel="alternate" hreflang="...">`
- `MetaData::alternates` property for defining language variants
- Automatic generation of alternate links
- Support for `x-default` fallback

### Changed
- `Meta` entity now includes alternate link rendering alongside canonical and image_src


## [2.1.0] - 2025-09-13
### Added
- `MetaFactory::addEntity()` for registering custom meta entities with priority
- `MetaFactory::removeEntity()` for unregistering previously added entities
- Unit tests for entity management methods
- `phpstan.neon.dist` configuration (level 10)

### Changed
- Improved type safety in `MetaData` constructor (`array<string, string|null>` for `custom` and `extraParams`)
- Improved PHPDoc and typing in `AbstractMetaEntity::renderTags()`
- Updated `composer.json` with dev dependencies (`phpstan`, `phpstan-strict-rules`) and convenient scripts

---
## [2.0.1] - 2025-09-13
### Added
- Unit tests for all tag classes and core entities:
    - `MetaTag`, `OpenGraphTag`, `TwitterTag`, `DcTag`, `LinkTag`, `TitleTag`
    - `MetaData` and `MetaFactory`

---

## [2.0.0] - 2025-09-12
### Changed
- Refactored tag classes:
    - Introduced `AbstractTag` for shared logic
    - `MetaTag`, `OpenGraphTag`, `TwitterTag`, `DcTag`, `LinkTag` now extend `AbstractTag`
    - `TitleTag` remains a special case with `SimpleTagTrait`
- Added `MetaEntityInterface` to unify all meta entities
- Updated `AbstractMetaEntity` to use readonly `MetaData` injection
- Simplified `MetaFactory`:
    - Uses collection of entities instead of hardcoded calls
    - Now implements `Stringable`

### Breaking Changes
- Direct construction of tag classes may differ (all now require `key, content`)
- `MetaFactory` internals refactored; behavior is the same but extending it requires changes
- `MetaData::getTitle()` replaces `setDynamicTitle()`

---

## [1.0.0] - 2025-09-12
- Initial stable release of `lemonade/component_meta`

---

## [0.1.0] - 2018-05-01
- First experimental attempt at OOP meta handling
- Based on large associative arrays with many setters
- Entities used magic key names (`_appAuthor`, `_appKeywords`, …)
- Verbose and hard to extend
- Prototype version, never intended for production
