<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use QL\QueryList;

class ThirdCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'third_collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '第三阶段采集';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [];
        foreach ($this->urls() as $url) {
            $rules = [
                'title'   => ['h1', 'text'],
                'topic'   => ['.tag>a', 'text'],
                'content' => ['.main', 'html'],
                'cover'   => ['.main img', '_src'],
            ];
            $rt = QueryList::get($url['url'])->rules($rules)->query()->getData()->all()[0];
            $topic = isset($rt['topic']) ? $rt['topic'] : "故事";
            $cover = isset($rt['cover']) ? $rt['cover'] : "";
            $data[] = [
                'user_id'     => mt_rand(1, 50),
                'category_id' => $url['category_id'],
                'title'       => $rt['title'],
                'body'        => $rt['content'],
                'topic'       => $topic,
                'cover'       => $cover,
                'excerpt'     => make_excerpt($rt['content']),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ];
        }
        DB::table('articles')->insert($data);
    }

    public function urls()
    {
        return [
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69689.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69684.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69648.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69574.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69541.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69521.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69516.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69497.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69400.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69392.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69376.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69347.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69338.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69328.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69206.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69199.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69192.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69190.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69182.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69174.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69172.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69158.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69145.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/69018.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68986.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68909.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68875.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68873.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68832.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68827.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68824.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68815.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68812.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68795.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68793.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68746.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68743.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68741.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68740.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68731.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68709.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68704.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68698.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68684.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68643.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68642.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68598.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68581.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68546.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68530.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68522.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68505.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68504.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68497.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68493.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68466.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68322.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/68321.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67820.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67797.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67787.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67776.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67772.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67733.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67732.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67731.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67699.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67694.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67682.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67679.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67678.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67633.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67621.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67620.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67616.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67608.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67607.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67606.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/67549.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66818.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66812.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66808.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66801.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66791.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66763.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66757.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66748.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66744.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66740.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66703.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66700.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66696.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66695.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66592.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66590.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66568.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66562.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66558.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66546.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66525.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66506.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66497.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66476.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66471.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66469.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66454.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66428.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66392.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66322.html',
            ],
            [
                'category_id' => '7',
                'url'=>'https://www.guozhi.org/lizhi/66308.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69728.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69727.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69722.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69719.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69718.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69717.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69704.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69702.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69698.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69697.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69693.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69685.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69682.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69681.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69680.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69679.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69677.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69676.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69674.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69672.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69662.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69661.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69654.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69653.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69652.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69651.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69642.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69641.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69638.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69637.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69636.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69628.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69617.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69607.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69606.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69605.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69603.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69601.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69602.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69599.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69598.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69595.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69594.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69592.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69593.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69591.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69590.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69589.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69588.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69587.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69562.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69561.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69560.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69558.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69559.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69557.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69549.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69548.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69547.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69546.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69539.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69538.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69537.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69536.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69534.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69532.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69526.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69525.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69524.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69514.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69513.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69510.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69506.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69507.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69505.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69504.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69503.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69502.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69501.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69488.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69487.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69486.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69485.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69483.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69478.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69479.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69477.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69476.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69475.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69474.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69471.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69470.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69468.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69467.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69466.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69465.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69464.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69462.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69460.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69459.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69457.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69458.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69456.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69430.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69426.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69422.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69421.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69419.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69420.html',
            ],
            [
                'category_id' => '8',
                'url'=>'https://www.guozhi.org/zhishi/69418.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/69056.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/68471.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66614.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66587.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66582.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66574.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66571.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66569.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66560.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66536.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66522.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66521.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66511.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66504.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66487.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66477.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66473.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66459.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66427.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66413.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66394.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66384.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66301.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66277.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66220.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66192.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66185.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66121.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/66098.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/65582.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/65212.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/64430.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/64235.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/64179.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/63978.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/63977.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/63377.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/61635.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/60302.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/59864.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/59534.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/59531.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/59327.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58894.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58892.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58890.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58856.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58796.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58795.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58588.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58587.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58401.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58337.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58336.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58303.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58122.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58121.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/58120.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56812.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56811.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56810.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56809.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56808.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56676.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56611.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56580.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56579.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56578.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56339.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56338.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56336.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56062.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56058.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56057.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/56054.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55994.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55655.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55654.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55653.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55652.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55651.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55650.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55644.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55355.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55066.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55065.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55038.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55037.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55006.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/55005.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/54985.html',
            ],
            [
                'category_id' => '9',
                'url'=>'https://www.guozhi.org/qingqu/54941.html',
            ]
        ];
    }
}
