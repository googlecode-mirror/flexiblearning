<?php

class IntroController extends CController {
    public function actionIndex() {
        $this->renderFile($this->getViewFile('index'));
    }
}