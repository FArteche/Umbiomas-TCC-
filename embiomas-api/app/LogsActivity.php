<?php

namespace App;

use App\Models\HistoricoAlteracao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        // Evento "created": dispara DEPOIS que um novo registro é salvo no banco
        static::created(function (Model $model) {
            self::logActivity($model, 'criacao');
        });

        // Evento "updated": dispara DEPOIS que um registro é atualizado
        static::updated(function (Model $model) {
            self::logActivity($model, 'edicao');
        });

        // Evento "deleted": dispara ANTES que um registro seja deletado
        static::deleted(function (Model $model) {
            self::logActivity($model, 'exclusao');
        });
    }

    /**
     * Função auxiliar para registrar a atividade.
     */
    protected static function logActivity(Model $model, string $tipoAlteracao)
    {
        // Pega o nome da classe do model, ex: "Fauna"
        $nomeObjeto = class_basename($model);

        // Monta a mensagem de detalhes
        $detalhes = self::buildLogDetails($model, $nomeObjeto, $tipoAlteracao);

        // Cria o registro no histórico usando o relacionamento polimórfico
        $model->historico()->create([
            'user_id' => Auth::id() ?? 1, // Usa 1 se não houver usuário autenticado
            'tipo_alteracao' => $tipoAlteracao,
            'detalhes_alteracao' => $detalhes,
        ]);
    }

    /**
     * Constrói a string de detalhes de forma inteligente.
     */
    private static function buildLogDetails(Model $model, string $nomeObjeto, string $tipoAlteracao): string
    {
        // Pega o nome do item. Assumimos que a maioria tem um atributo 'nome' ou similar.
        // Adapte 'nome' se seus models usarem 'nome_fauna', 'nome_ap', etc.
        $nomeItem = $model->nome ??
            $model->nome_fauna ??
            $model->nome_ap ??
            $model->nome_cse ??
            $model->nome_tipocse ??
            $model->nome_tipoap ??
            $model->nome_relevo ??
            $model->nome_hidrografia ??
            $model->nome_flora ??
            $model->nome_clima ??
            $model->nome_ ??  '';

        $mensagem = ucfirst($nomeObjeto) . " $tipoAlteracao: " . $nomeItem;

        // Verifica se o objeto TEM a propriedade 'bioma_id' E se ela não é nula
        if (isset($model->bioma_id) && $model->bioma) {
            $mensagem .= " (Bioma: " . $model->bioma->nome_bioma . ")";
        }

        return $mensagem;
    }
}
