@extends('layouts.general')

@section('breadcrumb')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">{{ __('Dashboard') }}</a></li>
            <li><a href="{{ route('classifications') }}" aria-current="page">{{ __('Classificações') }}</a></li>
            <li class="is-active"><a href="#" aria-current="page">{{ $classification->title }}</a></li>
            <li class="is-active"><a href="#" aria-current="page">{{ (int) $id > 0 ? __('Editar técnica') : __('Nova técnica') }}</a></li>
        </ul>
    </nav>
@endsection

@section('content')
    <div class="columns has-background-white">
        <div class="column is-12">
            <form id="form" action="{{ (int) $id > 0 ?
                route('entities.update', ['classificationId' => (int) $classificationId, 'id' => (int) $id]) :
                route('entities.store', ['classificationId' => (int) $classificationId]) }}"
                  method="POST">
                @if ((int) $id > 0)
                    @method('PUT')
                @endif
                @csrf
                <input type="hidden" name="classification_id" value="{{ $classificationId }}">
                @if ($entity) <input type="hidden" name="id" value="{{ $id }}"> @endif

                <div class="tabs is-medium">
                    <ul>
                        <li class="is-active" @click="tab='default'">
                            <a href="#"><span>Definição</span></a>
                        </li>
                        @if ($entity)
                        <li>
                            <a href="{{ route('entities.classification', [
                                'classificationId' => $classificationId,
                                'id' => $id,
                            ]) }}"><span>Classificação</span></a>
                        </li>
                        <li>
                            <a href="{{ route('entities.references', [
                                'classificationId' => $classificationId,
                                'id' => $id,
                            ]) }}"><span>Referências</span></a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="box help-content has-background-white">
                    <div class="field">
                        <label class="label">{{ __('Título') }}</label>
                        <div class="control">
                            <input name="title" class="input is-medium" type="text" placeholder="{{ __('Informe o título') }}" value="{{ $entity ? $entity->title : null }}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Slug') }}</label>
                        <div class="control">
                            <input name="slug" class="input is-medium" type="text" placeholder="{{ __('Informe o slug') }}" value="{{ $entity ? $entity->slug : null }}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Resumo') }}</label>
                        <div class="control">
                            <textarea name="short_description" rows="2" class="textarea" placeholder="{{ __('Informe a descrição') }}">{{ $entity ? $entity->short_description : null }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Descrição') }}</label>
                        <div class="control">
                            <textarea name="description" class="textarea" placeholder="{{ __('Informe a descrição') }}">{{ $entity ? $entity->description : null }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Prós') }}</label>
                        <div class="control">
                            <textarea name="pros" class="textarea" placeholder="{{ __('Informe os pontos positivos') }}">{{ $entity ? $entity->pros : null }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Contras') }}</label>
                        <div class="control">
                            <textarea name="cons" class="textarea" placeholder="{{ __('Informe os pontos negativos') }}">{{ $entity ? $entity->cons : null }}</textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Imagens') }}</label>
                        <div class="control">
                            <textarea name="images" class="textarea" placeholder="{{ __('Informe as imagens') }}">{{ $entity ? $entity->images : null }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">{{ (int) $id > 0 ? __('Alterar') : __('Cadastrar') }}</button>
                    </div>
                    <div class="control">
                        <button class="button is-text"></button>
                        <a href="{{ route('classifications.entities', ['classificationId' => $classificationId]) }}" class="button is-text">{{ __('Cancelar') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

