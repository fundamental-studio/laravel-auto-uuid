<?php

    namespace Fundamental\Uuid;

    use Ramsey\Uuid\Uuid;

    trait HasUuid
    {
        public function setHashAttribute()
        {
            $uuid = (config('uuid_version')) ? Uuid::uuid1()->toString() : Uuid::uuid4()->toString();

            $this->attributes[config('uuid_field')] = $uuid;
        }
    }