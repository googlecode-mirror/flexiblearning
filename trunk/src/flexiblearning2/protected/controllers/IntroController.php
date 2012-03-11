<?php

class IntroController extends Controller {
    public function actionIndex() {
        $this->renderFile($this->getViewFile('index'));
    }
}