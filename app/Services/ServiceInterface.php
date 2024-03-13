<?php

namespace Services;

interface ServiceInterface {
    public function fetchAll();
    public function fetch();
    public function store();
    public function update();
    public function destroy();
}