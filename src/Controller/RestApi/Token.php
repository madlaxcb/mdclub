<?php

declare(strict_types=1);

namespace MDClub\Controller\RestApi;

use MDClub\Controller\Abstracts;

/**
 * 身份验证
 */
class Token extends Abstracts
{
    /**
     * 创建 token
     *
     * @return array
     */
    public function create(): array
    {
        $token = $this->tokenCreateService->create(
            $this->request->getParsedBody()['name'] ?? '',
            $this->request->getParsedBody()['password'] ?? '',
            $this->request->getParsedBody()['device'] ?? ''
        );
        $this->auth->setToken($token);

        return $this->auth->getTokenInfo();
    }
}