<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\DemoProcessWireBundle\Controller;

use ONGR\ElasticsearchBundle\Document\DocumentInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Manages content for home and info pages.
 */
class ContentController extends Controller
{
    /**
     * App index page controller.
     *
     * @return Response
     */
    public function homePageAction()
    {
        return $this->render(
            'ONGRDemoBundle::home.html.twig',
            []
        );
    }

    /**
     * Renders a document.
     *
     * @param DocumentInterface $document
     *
     * @return Response
     */
    public function documentAction($document)
    {
        return $this->render(
            'ONGRDemoBundle:Content:page.html.twig',
            [
                'content' => $document,
            ]
        );
    }

    /**
     * Render cms body in template.
     *
     * @param string $slug
     * @param string $template
     *
     * @return Response
     */
    public function snippetAction($slug, $template)
    {
        $document = $this->get('ongr_content.content_service')->getDocumentBySlug($slug);

        return $this->render(
            $template,
            [
                'content' => $document->content,
                'title' => $document->title,
                'document' => $document,
            ]
        );
    }
}
