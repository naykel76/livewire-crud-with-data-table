<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

# NAYKEL Web Application

### Course Table ERD

```mermaid
erDiagram
    COURSE {
        int id
        string name
        string code
        longText description
        string image
        string status
        int price
        boolean is_free
        dateTime published_at
        dateTime reviewed_at
        json extra_data
    }
```

### Edit Event Sequence Diagram

This diagram shows the sequence of events when the user selects a course to `edit` from the table view.

- The `CrateEdit::class` has an `edit` method that listening for the `edit-course` event.
- The `table` view will dispatch the `edit-course` event using the `$dispatchTo` method when the `edit` button is clicked.
- After changes are complete, the user will click the save button which will fire the `save` method in the `CreateEdit::class`
- The `save` method will dispatch the `notify` event to display the toast component with the `save` message.
- The `save` method will dispatch the `saved` event to tell the `table` view to refresh the table.
- The `table` view listens for the `saved` event and refresh the table.

```mermaid
sequenceDiagram
    actor User
    participant TV as Table Component<br/>(View)
    participant CE as CreateEdit<br/>(Component)
    participant CEV as CreateEdit<br/>(View)

    User->>TV: Clicks 'Edit' button
    activate TV
    Note over CE: listening for 'edit-course' event"
    TV->>CE: dispatch 'edit-course' event  (id)
    activate CE
    CE->>CEV: Fetch course and setModel(Course)
    activate CEV
    CEV-->>User: Display form with course details
    deactivate CEV
    User->>CE: Clicks 'Save' button
    CE->>CE: Persist data and dispatch 'notify' event with (msg)<br> and then dispatch 'saved' event
    deactivate CE
    Note over TV: listening for 'saved' event<br/>@saved="$refresh"
    TV->>TV: Refresh the table
    TV->>User: Display updated table
    deactivate TV
```


## 'Create' Event Sequence Diagram

```mermaid
sequenceDiagram
    actor User
    participant M as mount()
    participant C as Course<br>(Model)
    participant F as Form
    participant R as render()

    User->>M: Clicks 'create'
    activate M
    M->>M: Calls mount(course)
    alt Course not found
        M->>C: Create new Course
    end
    activate C
    C-->>M: Return Course
    deactivate C
    M->>F: Calls setModel(Course)
    activate F
    F-->>M: Model set
    deactivate F
    M->>M: Calls setPageTitle()
    M->>R: Calls render()
    activate R
    R-->>User: Display form with Course details
    deactivate R
    deactivate M
```


```mermaid
classDiagram

    class Crudable{
        <<interface>>
        -pageTitle: string
        +edit(id) void
        +store(model, validated) void
        +update(model, validated) void
        +save() void
        -setPageTitle(routePrefix) string
        -modelExists() bool
    }

        class CreateEdit{
        +routePrefix: string
        +mount(?model):string
        +render()
    }
```


This diagram shows the sequence of events to mutate a date field to a boolean value and back
again. The `activated_at` field is a date field in the database but is displayed as a boolean
value in the UI. The `activated_at` field is set to `null` when the user clicks the `deactivate`
button and set to the current date when the user clicks the `activate` button.



```mermaid
sequenceDiagram
    actor User
    participant model as Model
    participant db as Database
    participant accessor as Accessor

    User->>model: Request data
    model->>db: Fetch data
    db-->>model: Return data
    model->>accessor: Pass 'activated_at' field
    accessor-->>model: Return boolean value
    model-->>User: Return data with 'activated_at' as boolean

    User->>model: Update 'activated_at'
    User->>model: Save data
    model->>accessor: Pass 'activated_at' field
    accessor-->>model: Return date value
    model->>db: Save data with 'activated_at' as date
    db-->>model: Confirm save
    model-->>User: Confirm update
```


protected function activatedAt(): Attribute
{
    return Attribute::make(
        get: fn ($value) => $value ? true : false,
        set: fn ($value) => $value ? now() : null,
    );
}
