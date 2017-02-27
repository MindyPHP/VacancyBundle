<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\VacancyBundle\Controller;

use Mindy\Bundle\MindyBundle\Controller\Controller;
use Mindy\Bundle\VacancyBundle\Model\Vacancy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VacancyController extends Controller
{
    public function listAction(Request $request)
    {
        $qs = Vacancy::objects()
            ->published()
            ->order(['-published_at']);
        $pager = $this->createPagination($qs);

        return $this->render('vacancy/list.html', [
            'vacancies' => $pager->paginate(),
            'pager' => $pager->createView(),
        ]);
    }

    public function viewAction(Request $request, $id)
    {
        $vacancy = Vacancy::objects()->get(['id' => $id]);
        if (null === $vacancy) {
            throw new NotFoundHttpException();
        }

        return $this->render('vacancy/view.html', [
            'vacancy' => $vacancy,
        ]);
    }
}
