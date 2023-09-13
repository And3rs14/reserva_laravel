<!-- El Modal -->
<div class="modal fade" id="reservarCitaModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Llenar Datos para Reservar Cita</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Aquí puedes agregar tus campos de entrada, por ejemplo: -->
                    <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                        <label for="client">{{ trans('cruds.appointment.fields.client') }}*</label>
                        <select name="client_id" id="client" class="form-control select2" required>
                            @foreach ($clients ?? '' as $id => $client)
                                <option value="{{ $id }}"
                                    {{ (isset($appointment) && $appointment->client ? $appointment->client->id : old('client_id')) == $id ? 'selected' : '' }}>
                                    {{ $client }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('client_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('client_id') }}
                            </em>
                        @endif
                    </div>
                    <!-- Agrega más campos según lo necesites -->
                    <div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
                        <label for="employee">{{ trans('cruds.appointment.fields.employee') }}</label>
                        <select name="employee_id" id="employee" class="form-control select2">
                            @foreach($employees as $id => $employee)
                                <option value="{{ $id }}" {{ (isset($appointment) && $appointment->employee ? $appointment->employee->id : old('employee_id')) == $id ? 'selected' : '' }}>{{ $employee }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('employee_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('employee_id') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                        <label for="start_time">{{ trans('cruds.appointment.fields.start_time') }}*</label>
                        <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($appointment) ? $appointment->start_time : '') }}" required>
                        @if($errors->has('start_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('start_time') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.appointment.fields.start_time_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('finish_time') ? 'has-error' : '' }}">
                        <label for="finish_time">{{ trans('cruds.appointment.fields.finish_time') }}*</label>
                        <input type="text" id="finish_time" name="finish_time" class="form-control datetime" value="{{ old('finish_time', isset($appointment) ? $appointment->finish_time : '') }}" required>
                        @if($errors->has('finish_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('finish_time') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.appointment.fields.finish_time_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label for="price">{{ trans('cruds.appointment.fields.price') }}</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($appointment) ? $appointment->price : '') }}" step="0.01">
                        @if($errors->has('price'))
                            <em class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.appointment.fields.price_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                        <label for="comments">{{ trans('cruds.appointment.fields.comments') }}</label>
                        <textarea id="comments" name="comments" class="form-control ">{{ old('comments', isset($appointment) ? $appointment->comments : '') }}</textarea>
                        @if($errors->has('comments'))
                            <em class="invalid-feedback">
                                {{ $errors->first('comments') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.appointment.fields.comments_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('services') ? 'has-error' : '' }}">
                        <label for="services">{{ trans('cruds.appointment.fields.services') }}
                            <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                        <select name="services[]" id="services" class="form-control select2" multiple="multiple">
                            @foreach($services as $id => $services)
                                <option value="{{ $id }}" {{ (in_array($id, old('services', [])) || isset($appointment) && $appointment->services->contains($id)) ? 'selected' : '' }}>{{ $services }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('services'))
                            <em class="invalid-feedback">
                                {{ $errors->first('services') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.appointment.fields.services_helper') }}
                        </p>
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <!-- Pie de página del Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('appointment_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.appointments.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.appointments.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'client_name',
                        name: 'client.name'
                    },
                    {
                        data: 'employee_name',
                        name: 'employee.name'
                    },
                    {
                        data: 'start_time',
                        name: 'start_time'
                    },
                    {
                        data: 'finish_time',
                        name: 'finish_time'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'comments',
                        name: 'comments'
                    },
                    {
                        data: 'services',
                        name: 'services.name'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            };
            $('.datatable-Appointment').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });
    </script>
@endsection
