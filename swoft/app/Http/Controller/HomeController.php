<?php declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Data\GoodsData;
use App\Model\Entity\User;
use Swoft;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function bean;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = 'OK';

        return context()->getResponse()->withContent($data);
    }

    /**
     * @RequestMapping("/api/healthz")
     *
     * @return Response
     */
    public function getHealthz(): Response
    {
        $datas = ['health' => 'OK'];

        return context()->getResponse()->withContentType(ContentType::JSON)->withData($datas);
    }

    /**
     * @RequestMapping("/api/user[/{id}]")
     *
     * @return Response
     */
    public function getUser(int $id): Response
    {
        $datas = User::select('name', 'email')->find($id);

        return context()->getResponse()->withContentType(ContentType::JSON)->withData($datas);
    }
}
