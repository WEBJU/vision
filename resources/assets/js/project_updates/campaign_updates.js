'use strict'

listen('click', '#addProjectUpdates', function () {
    $('#creatProjectUpdatesModal').appendTo('body').modal('show')
    resetModalForm('#createProjectUpdatesForm')
})

listen('hidden.bs.modal', '#editProjectUpdatesModal', function () {
    resetModalForm('#editProjectUpdatesForm')
})

listen('click', '.project-update-edit-btn', function (event) {
    let editProjectUpdatesId = $(event.currentTarget).data('id')
    renderProjectUpdatesData(editProjectUpdatesId)
})

function renderProjectUpdatesData (id) {
    $.ajax({
        url: route('project-updates.edit', id),
        type: 'GET',
        success: function (result) {
            $('#projectUpdatesID').val(result.data.id)

            $('#editProjectUpdatesTitle').val(result.data.title)

            $('#editProjectUpdatesDescription').val(result.data.description)

            $('#editProjectUpdatesModal').modal('show')
        },
    })
}

listen('submit', '#createProjectUpdatesForm', function (e) {
    e.preventDefault()
    $('#createProjectUpdateBtn').prop('disabled', true)
    $.ajax({
        url: route('project-updates.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                displaySuccessMessage(result.message)
                $('#creatProjectUpdatesModal').modal('hide')
                $('#createProjectUpdateBtn').prop('disabled', false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#createProjectUpdateBtn').prop('disabled', false)
        },
    })
})

listen('submit', '#editProjectUpdatesForm', function (e) {
    e.preventDefault()
    $('#editProjectUpdateBtn').prop('disabled', true)
    let formData = $(this).serialize()
    let id = $('#projectUpdatesID').val()
    $.ajax({
        url: route('project-updates.update', id),
        type: 'PUT',
        data: formData,
        success: function (result) {
            Livewire.emit('refresh', 'refresh')
            $('#editProjectUpdatesModal').modal('hide')
            displaySuccessMessage(result.message)
            $('#editProjectUpdateBtn').prop('disabled', false)
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#editProjectUpdateBtn').prop('disabled', false)
        },
        complete: function () {
        },
    })
})

listen('click', '.project_update-show-btn', function (event) {
    $('#showProjectUpdateModal').appendTo('body').modal('show')
    let projectFaqUpdate = $(event.currentTarget).data('id')
    $.ajax({
        url: route('project-updates.index') + '/' + projectFaqUpdate,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#faqUpdateShowTitle').html(result.data.title)
                $('#faqUpdateShowCreatedAt').
                    text(moment(result.data.created_at,
                        'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'))
                $('#faqUpdateShowUpdatedAt').
                    text(moment(result.data.updated_at,
                        'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'))
                let element = document.createElement('textarea')
                element.innerHTML = (!isEmpty(result.data.description))
                    ? result.data.description
                    : 'N/A'
                $('#faqUpdateShowDescription').html(element.value)
                Livewire.emit('refresh')
                $('#showProjectUpdateModal').appendTo('body').modal('show')

            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '.project-update-delete-btn', function (event) {
    let deleteFaqsId = $(event.currentTarget).data('id')
    deleteItem(route('project-updates.destroy', deleteFaqsId),
        'Project Updates')
})

listen('click', '#addUserProjectUpdates', function () {
    $('#creatProjectUpdatesModal').appendTo('body').modal('show')
    resetModalForm('#createUserProjectUpdatesForm')
})

listen('hidden.bs.modal', '#editUserProjectUpdatesModal', function () {
    resetModalForm('#editUserProjectUpdatesForm')
})

listen('click', '.user-project-update-edit-btn', function (event) {
    let editProjectUpdatesId = $(event.currentTarget).data('id')
    renderUserProjectUpdatesData(editProjectUpdatesId)
})

function renderUserProjectUpdatesData (id) {
    $.ajax({
        url: route('user.project-updates.edit', id),
        type: 'GET',
        success: function (result) {
            $('#projectUpdatesID').val(result.data.id)

            $('#editUserProjectUpdatesTitle').val(result.data.title)

            $('#editUserProjectUpdatesDescription  ').
                val(result.data.description)

            $('#editUserProjectUpdatesModal').modal('show')
        },
    })
}

listen('submit', '#createUserProjectUpdatesForm', function (e) {
    e.preventDefault()
    $('#createProjectUpdateBtn').prop('disabled', true)
    $.ajax({
        url: route('user.project-updates.store'),
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                Livewire.emit('refresh', 'refresh')
                displaySuccessMessage(result.message)
                $('#creatProjectUpdatesModal').modal('hide')
                $('#createProjectUpdateBtn').prop('disabled', false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#createProjectUpdateBtn').prop('disabled', false)
        },
    })
})

listen('submit', '#editUserProjectUpdatesForm', function (e) {
    e.preventDefault()
    $('#editProjectUpdateBtn').prop('disabled', true)
    let formData = $(this).serialize()
    let id = $('#projectUpdatesID').val()
    $.ajax({
        url: route('user.project-updates.update', id),
        type: 'PUT',
        data: formData,
        success: function (result) {
            Livewire.emit('refresh', 'refresh')
            $('#editUserProjectUpdatesModal').modal('hide')
            displaySuccessMessage(result.message)
            $('#editProjectUpdateBtn').prop('disabled', false)
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
            $('#editProjectUpdateBtn').prop('disabled', false)
        },
        complete: function () {
        },
    })
})

listen('click', '.user-project-update-show-btn', function (event) {
    $('#showProjectUpdateModal').appendTo('body').modal('show')
    let projectFaqUpdate = $(event.currentTarget).data('id')
    $.ajax({
        url: route('user.project-updates.index') + '/' + projectFaqUpdate,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#faqUpdateShowTitle').html(result.data.title)
                $('#faqUpdateShowCreatedAt').
                    text(moment(result.data.created_at,
                        'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'))
                $('#faqUpdateShowUpdatedAt').
                    text(moment(result.data.updated_at,
                        'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'))
                let element = document.createElement('textarea')
                element.innerHTML = (!isEmpty(result.data.description))
                    ? result.data.description
                    : 'N/A'
                $('#faqUpdateShowDescription').html(element.value)
                Livewire.emit('refresh')
                $('#showProjectUpdateModal').appendTo('body').modal('show')

            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})

listen('click', '.user-project-update-delete-btn', function (event) {
    let deleteFaqsId = $(event.currentTarget).data('id')
    deleteItem(route('user.project-updates.destroy', deleteFaqsId),
        'Project Updates')
})
