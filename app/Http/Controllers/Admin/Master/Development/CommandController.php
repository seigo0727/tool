<?php

namespace App\Http\Controllers\Admin\Master\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function index(Request $request)
    {
        $endpoint = route('admin.master.development.command.execute');

        return view('admin.master.development.command.index', [
            'endpoint' => $endpoint,
        ]);
    }

    public function execute(Request $request)
    {
        $command = $request->get('command');
        $log = '';
        $commandList = [];

        switch($command)
        {
            case 'cache:clear': // キャッシュクリア
                $commandList[] = [
                    'command' => 'cache:clear',
                    'parameters' => []
                ];
                $commandList[] = [
                    'command' => 'config:clear',
                    'parameters' => []
                ];
                $commandList[] = [
                    'command' => 'route:clear',
                    'parameters' => []
                ];
                $commandList[] = [
                    'command' => 'view:clear',
                    'parameters' => []
                ];
                break;
            case 'migration': // マイグレーション
                $commandList[] = [
                    'command' => 'doctrine:migrations:diff',
                    'parameters' => [
                        '--no-interaction' => true,
                        '-v' => true
                    ]
                ];
                $commandList[] = [
                    'command' => 'doctrine:migrations:migrate',
                    'parameters' => [
                        '--no-interaction' => true,
                        '-v' => true
                    ]
                ];
                break;
        }

        foreach($commandList as $value)
        {
            $parameters = $value['parameters'] ?? [];
            try {
                \Artisan::call($value['command'], $parameters);
                if(!empty($parameters)){
                    $log .= $value['command'] . ' ' . $this->parametersToString($parameters) . \PHP_EOL;
                } else {
                    $log .= $value['command'] . \PHP_EOL;
                }
                $log .= \Artisan::output() . \PHP_EOL;
            } catch(\Exception $e) {
                $log .= $e->getMessage();
            }
        }

        $result = [
            'log' => $log,
        ];

        return response()->json($result);
    }

    /**
     * 文字列にパース
     *
     * @param [type] $parameters
     * @return void
     */
    protected function parametersToString($parameters)
    {
        $parts = [];

        foreach($parameters as $key => $value){
            if($value === true){
                $parts[] = $key;
            } else {
                $parts[] = sprintf("%s=%s", $key, $value);
            }
        }

        return implode(' ', $parts);
    }
}
