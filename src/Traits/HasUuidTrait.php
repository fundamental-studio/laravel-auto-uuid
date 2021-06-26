<?php

    namespace Fundamental\Uuid;

    use Ramsey\Uuid\Uuid;

    trait HasUuid
    {
        public function setHashAttribute()
        {
            $field = config('uuid_field');
            $version = (config('uuid_version') and config('uuid_version') == 1) ? '1' : '4';

            if (property_exists($this, 'uuidVersion')) {
                if (in_array($this->uuidVersion, ['1', '4'])) {
                    $version = $this->uuidVersion;
                }
            }

            if (property_exists($this, 'uuidField')) {
                $field = $this->uuidField;
            }

            $uuid = ($version == '1') ? Uuid::uuid1()->toString() : Uuid::uuid4()->toString();

            $this->attributes[$field] = $uuid;
        }
    }