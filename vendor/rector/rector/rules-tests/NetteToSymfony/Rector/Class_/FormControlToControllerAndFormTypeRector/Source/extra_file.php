<?php

namespace Rector\Tests\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector\Fixture;

class SomeFormController extends \Typo3RectorPrefix20210412\Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    public function actionSomeForm(\Typo3RectorPrefix20210412\Symfony\Component\HttpFoundation\Request $request) : \Typo3RectorPrefix20210412\Symfony\Component\HttpFoundation\Response
    {
        $form = $this->createForm(\Rector\Tests\NetteToSymfony\Rector\Class_\FormControlToControllerAndFormTypeRector\Fixture\SomeFormType::class);
        $form->handleRequest($request);
        if ($form->isSuccess() && $form->isValid()) {
        }
    }
}
